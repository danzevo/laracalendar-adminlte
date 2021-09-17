<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index() {
        return view('pages/country/index');
    }

    public function getData() {
        $data = Country::with(['userCreated', 'userModified'])->orderBy('name')->get();

        return datatables()->of($data)
        ->addColumn('created_by', function ($data) {
            return isset($data->userCreated->name)?$data->userCreated->name:'';
        })
        ->addColumn('last_modified_by', function ($data) {
            return isset($data->userModified->name)?$data->userModified->name:'';
        })
        ->addColumn('created_at', function ($data) {
            return $data->created_at ? date('Y-m-d H:i:s', strtotime($data->created_at)) : '';
        })
        ->addColumn('updated_at', function ($data) {
            return $data->updated_at? date('Y-m-d H:i:s', strtotime($data->updated_at)) : '';
        })
        ->rawColumns(['created_by','last_modified_by','created_at','updated_at'])
        ->make(true);
    }

    public function store(Request $req){
        $id = $req->id;

        if(!$id) {
            $validated = $req->validate([
                'name' => 'required|unique:City|max:255',
            ]);
        }

        if($id) {
            $country = Country::where('id', $id)->first();
            $country->last_modified_by = auth()->user()->id;
            $country->updated_at = date('Y-m-d H:i:s');
        } else {
            $country = new Country;
            $country->created_by = auth()->user()->id;
            $country->created_at = date('Y-m-d H:i:s');
        }

        $country->name = $req->name;
        $country->slug = $req->slug;

        if ($country->save()) {
			$message = array();
            $message['message'] = 'Data saved successfully';

            return response()->json($message)->setStatusCode(200);
		}else{

			$message = array();
            $message['message'] = 'Data failed to save';

            return response()->json($message)->setStatusCode(400);
		}
	}

    public function save_published(Request $req){
        $id = $req->id;

        $country = Country::where('id', $id)->first();
        $country->last_modified_by = auth()->user()->id;
        $country->updated_at = date('Y-m-d H:i:s');
        $country->published = $req->published;

        if ($country->save()) {
			$message = array();
            $message['message'] = 'Data saved successfully';

            return response()->json($message)->setStatusCode(200);
		}else{

			$message = array();
            $message['message'] = 'Data failed to save';

            return response()->json($message)->setStatusCode(400);
		}
	}

	public function destroy($id){
        $country = Country::where('id', $id)->first();

        if ($country->delete()) {
			$message = array();
            $message['message'] = 'Data deleted successfully';

            return response()->json($message)->setStatusCode(200);
		}else{

			$message = array();
            $message['message'] = 'Data failed to delete';

            return response()->json($message)->setStatusCode(400);
		}
	}
}
