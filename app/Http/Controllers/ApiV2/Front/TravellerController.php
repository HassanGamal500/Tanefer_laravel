<?php

namespace App\Http\Controllers\ApiV2\Front;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TravellerController extends Controller
{
    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function saveTravellerData(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'passenger_title' => 'nullable|string|max:191',
            'passenger_gender' => 'nullable|string|max:191',
            'passenger_first_name' => 'nullable|string|max:191',
            'passenger_last_name' => 'nullable|string|max:191',
            'date_of_birth' => 'nullable|date',
            'pass_expire_date' => 'nullable|date',
            'pass_num' => 'nullable|string|max:191',
            'issue_country' => 'nullable|string|max:191',
        ]);

        try {
            $user = User::findOrFail($validatedData['user_id']);

            $user->passenger_title = $validatedData['passenger_title'];
            $user->passenger_gender = $validatedData['passenger_gender'];
            $user->passenger_first_name = $validatedData['passenger_first_name'];
            $user->passenger_last_name = $validatedData['passenger_last_name'];
            $user->date_of_birth = $validatedData['date_of_birth'];
            $user->pass_expire_date = $validatedData['pass_expire_date'];
            $user->pass_num = $validatedData['pass_num'];
            $user->issue_country = $validatedData['issue_country'];
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Traveller data saved successfully',
                'user' => $user
            ], 200);  

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving traveller data',
                'error' => $e->getMessage()
            ], 500); 
        }
    }

    /**
     *
     * @param int $userId
     * @return \Illuminate\Http\Response
     */
    public function getTravellerData($userId)
    {
        try {
            $user = User::findOrFail($userId);

            return response()->json([
                'success' => true,
                'data' => [
                    'passenger_title' => $user->passenger_title,
                    'passenger_gender' => $user->passenger_gender,
                    'passenger_first_name' => $user->passenger_first_name,
                    'passenger_last_name' => $user->passenger_last_name,
                    'date_of_birth' => $user->date_of_birth,
                    'pass_expire_date' => $user->pass_expire_date,
                    'pass_num' => $user->pass_num,
                    'issue_country' => $user->issue_country,
                ]
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching traveller data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
