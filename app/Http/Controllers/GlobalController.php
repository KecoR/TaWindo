<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lensa;

class GlobalController extends Controller
{
    //Lensa Section
    public function lensaIndex() {
        $lensaData = Lensa::select('id', 'name', 'price', 'image')->get();

        return view('lensa', ['lensaData' => $lensaData]);
    }

    public function lensaSave(Request $request) {
        if ($request->id) {
            $action = 'edit';
            $lensaData = Lensa::findOrFail($request->id);
        } else {
            $action = 'add';
            $lensaData = new Lensa;
        }

        $lensaData->name = $request->name;
        $lensaData->price = $request->price;
        $lensaData->description = $request->description;

        if ($action == 'add') {
            $image = $request->file('image');
            $file_name = 
            $this->generateRandomString().'.'.$image->getClientOriginalExtension();
            $lensaData->image = $file_name;
            $image->move(public_path().'/image/',$file_name); 
        } else {
            if ($request->file('image')) {
                if ($lensaData->image && file_exists('image/'.$lensaData->image)) {
                    unlink('image/'.$lensaData->image);
                }

                $image = $request->file('image');
                $file_name = 
                $this->generateRandomString().'.'.$image->getClientOriginalExtension();
                $lensaData->image = $file_name;
                $image->move(public_path().'/image/',$file_name); 
            }
        }

        $lensaData->save();

        if ($action == 'add') {
            return redirect()->route('lensaIndex')->with('status', 'Berhasil menambah lensa');
        } else {
            return redirect()->route('lensaIndex')->with('status', 'Berhasil mengubah lensa');
        }
    }

    public function lensaGetData($id) {
        $lensaData = Lensa::findOrFail($id);

        return $lensaData;
    }

    public function lensaDelete($id) {
        $lensaData = Lensa::findOrFail($id);

        if ($lensaData->image) {
            unlink('image/'.$lensaData->image);
        }

        $lensaData->delete();

        return redirect()->route('lensaIndex')->with('status', 'Lensa berhasil dihapus.');
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
