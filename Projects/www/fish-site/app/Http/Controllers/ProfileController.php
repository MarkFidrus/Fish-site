<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController
{
    private function index()
    {
        $profileData = DB::table('users')->where('id', Auth::id())->first();

        $friends = $this->getFriends(Auth::id());
        $friendRequestsReceived = $this->getReceivedFriendRequests(Auth::id());
        $friendRequestsSent = $this->getSentFriendRequests(Auth::id());

        return view('profile.index', ['less' => '', 'title' => $profileData->name], compact('profileData', 'friends', 'friendRequestsReceived', 'friendRequestsSent'));
    }

    private function show(int $id)
    {
        $profileData = DB::table('users')->where('id', $id)->first();

        $friends = $this->getFriends($id);
        $friendRequestsReceived = $this->getReceivedFriendRequests($id);
        $friendRequestsSent = $this->getSentFriendRequests($id);

        return view('profile.show', ['less' => '', 'title' => $profileData->name], compact('profileData', 'friends', 'friendRequestsReceived', 'friendRequestsSent'));
    }

    public function get_selector(int $id)
    {
        if ($id === Auth::id())
        {
            $this->index();
        }
        else
        {
            $this->show($id);
        }
    }

    public function post_selector(int $id)
    {
        switch ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            case $_POST['acceptFriendRequest']:
                $this->acceptFriendRequest($id);
                break;
            case $_POST['declineFriendRequest']:
                $this->declineFriendRequest($id);
                break;
            case $_POST['removeFriend']:
                $this->removeFriend($id);
                break;
            case $_POST['undoFriendRequest']:
                $this->undoFriendRequest($id);
                break;
            case $_POST['sendFriendRequest']:
                $this->sendFriendRequest($id);
                break;
        }
    }

    private function getFriends(int $id): array|null
    {
        $friendsDB = DB::table('users')->where('id', $id)->first();

        if (strlen($friendsDB->friends) === 0)
        {
            return [];
        }
        $friendsDecoded = $this->strToIntArr($friendsDB);

        $friends = [];

        foreach ($friendsDecoded as $friend)
        {
            array_push($friends, DB::table('users')->where('id', $friend)->first());
        }

        return $friends;
    }

    private function getReceivedFriendRequests(int $id): array|null
    {
        $receivedFriendRequests = DB::table('users')->where('id', $id)->first();

        if (strlen($receivedFriendRequests->friend_requests_received) === 0)
        {
            return [];
        }

        $receivedRequestsDecoded = $this->strToIntArr($receivedFriendRequests);

        $receivedRequests = [];

        foreach ($receivedRequestsDecoded as $request)
        {
            array_push($receivedRequests, DB::table('users')->where('id', $request)->first());
        }

        return $receivedRequests;
    }

    private function getSentFriendRequests(int $id): array|null
    {
        $sentFriendRequests = DB::table('users')->where('id', $id)->first();

        if (strlen($sentFriendRequests->friend_requests_sent) === 0)
        {
            return [];
        }

        $sentRequestsDecoded = $this->strToIntArr($sentFriendRequests);

        $sentRequests = [];

        foreach ($sentRequestsDecoded as $request)
        {
            array_push($sentRequests, DB::table('users')->where('id', $request)->first());
        }

        return $sentRequests;
    }

    private function acceptFriendRequest(int $id)
    {
        $this->addFriend($id);
        $this->undoFriendRequest($id);
    }

    private function declineFriendRequest(int $id)
    {
        $receivedFriendRequests = $this->getReceivedFriendRequests(Auth::id());
        $sentFriendRequests = $this->getSentFriendRequests($id);

        $refreshedReceivedFriendRequests = $this->removeUserFromList($id, $receivedFriendRequests);
        $refreshedSentFriendRequests = $this->removeUserFromList(Auth::id(), $sentFriendRequests);

        $this->refreshFriendsOrRequests(Auth::id(), $refreshedReceivedFriendRequests, 'friend_requests_received');
        $this->refreshFriendsOrRequests($id, $refreshedSentFriendRequests, 'friend_requests_sent');
    }

    private function undoFriendRequest(int $id)
    {
        (array) $receivedFriendRequests = $this->getSentFriendRequests($id);
        (array) $sentFriendRequests = $this->getReceivedFriendRequests(Auth::id());

        $newReceivedRequests = $this->removeUserFromList($id, $receivedFriendRequests);
        $newSentRequests = $this->removeUserFromList(Auth::id(), $sentFriendRequests);

        $this->refreshFriendsOrRequests($id, $newReceivedRequests, 'friend_requests_received');
        $this->refreshFriendsOrRequests(Auth::id(), $newSentRequests, 'friend_requests_sent');
    }

    private function sendFriendRequest(int $id)
    {
        (array) $receivedFriendRequests = $this->getSentFriendRequests($id);
        (array) $sentFriendRequests = $this->getReceivedFriendRequests(Auth::id());

        array_push($receivedFriendRequests, $id);
        array_push($sentFriendRequests, Auth::id());

        $this->refreshFriendsOrRequests($id, $receivedFriendRequests, 'friend_requests_received');
        $this->refreshFriendsOrRequests(Auth::id(), $sentFriendRequests, 'friend_requests_sent');
    }

    private function removeUserFromList(int $element, array $list): array
    {
        $arr = [];

        foreach ($list as $item)
        {
            if ($element !== $item)
            {
                array_push($arr, $item);
            }
        }

        return $arr;
    }

    private function strToIntArr(string $data): array
    {
        (array) $arr = explode(',', $data);
        $returnArr = [];

        foreach ($arr as $id)
        {
            array_push($returnArr, intval($id));
        }

        return $returnArr;
    }

    private function addFriend(int $id)
    {
        (array) $receiverFriends = $this->getFriends(Auth::id());
        (array) $senderFriends = $this->getFriends($id);

        array_push($receiverFriends, $id);
        array_push($senderFriends, Auth::id());

        $this->refreshFriendsOrRequests(Auth::id(), $receiverFriends, 'friends');
        $this->refreshFriendsOrRequests($id, $senderFriends, 'friends');
    }

    private function removeFriend(int $id)
    {
        (array) $loggedInUserFriends = $this->getFriends(Auth::id());
        (array) $otherUserFriends = $this->getFriends($id);

        $newLoggedInUserFriends = $this->removeUserFromList($id, $loggedInUserFriends);
        $newOtherUserFriends = $this->removeUserFromList(Auth::id(), $otherUserFriends);

        $this->refreshFriendsOrRequests($id, $newOtherUserFriends, 'friends');
        $this->refreshFriendsOrRequests(Auth::id(), $newLoggedInUserFriends, 'friends');
    }

    private function refreshFriendsOrRequests(int $id, array $arr, string $type)
    {
        $arrToStr = implode(',', $arr);

        DB::table('users')->where('id', $id)->update([
            $type => $arrToStr
        ]);
    }

}
