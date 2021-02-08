<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lensa;
use App\Frame;
use App\About;
use App\Transaction;

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

    //Frame Section
    public function frameIndex() {
        $frameData = Frame::select('id', 'name', 'frame_type', 'price', 'image')->get();

        return view('frame', ['frameData' => $frameData]);
    }

    public function frameSave(Request $request) {
        if ($request->id) {
            $action = 'edit';
            $frameData = Frame::findOrFail($request->id);
        } else {
            $action = 'add';
            $frameData = new Frame;
        }

        $frameData->name = $request->name;
        $frameData->price = $request->price;
        $frameData->description = $request->description;
        $frameData->frame_type = $request->frame_type;

        if ($action == 'add') {
            $image = $request->file('image');
            $file_name = 
            $this->generateRandomString().'.'.$image->getClientOriginalExtension();
            $frameData->image = $file_name;
            $image->move(public_path().'/image/',$file_name); 
        } else {
            if ($request->file('image')) {
                if ($frameData->image && file_exists('image/'.$frameData->image)) {
                    unlink('image/'.$frameData->image);
                }

                $image = $request->file('image');
                $file_name = 
                $this->generateRandomString().'.'.$image->getClientOriginalExtension();
                $frameData->image = $file_name;
                $image->move(public_path().'/image/',$file_name); 
            }
        }

        $frameData->save();

        if ($action == 'add') {
            return redirect()->route('frameIndex')->with('status', 'Berhasil menambah frame');
        } else {
            return redirect()->route('frameIndex')->with('status', 'Berhasil mengubah frame');
        }
    }

    public function frameGetData($id) {
        $frameData = Frame::findOrFail($id);

        return $frameData;
    }

    public function frameDelete($id) {
        $frameData = Frame::findOrFail($id);

        if ($frameData->image) {
            unlink('image/'.$frameData->image);
        }

        $frameData->delete();

        return redirect()->route('frameIndex')->with('status', 'Frame berhasil dihapus.');
    }

    //Section about
    public function aboutIndex() {
        $aboutData = About::select('name', 'address', 'whatsapp', 'instagram', 'facebook', 'bank', 'no_rek')->first();

        $disabled = '';

        if (!\Auth::user()) {
            $disabled = 'disabled';
        }

        return view('about', ['aboutData' => $aboutData, 'disabled' => $disabled]);
    }

    public function aboutSave(Request $request) {
        $aboutData = About::first();

        if ($aboutData == null) {
            $aboutData = new About;
        }

        $aboutData->name = $request->name;
        $aboutData->address = $request->address;
        $aboutData->whatsapp = $request->whatsapp;
        $aboutData->instagram = $request->instagram;
        $aboutData->facebook = $request->facebook;
        $aboutData->bank = $request->bank;
        $aboutData->no_rek = $request->no_rek;

        $aboutData->save();

        return redirect()->route('aboutIndex')->with('status', 'Data berhasil disimpan.');
    }

    //Section Order
    public function orderIndex() {
        $orderData = Transaction::with('frame', 'lensa')->get();

        return view('order', ['orderData' => $orderData]);
    }

    public function newOrderIndex() {
        $frameData = Frame::select('id', 'name')->get();
        $lensaData = Lensa::select('id', 'name')->get();

        return view('neworder', ['frameData' => $frameData, 'lensaData' => $lensaData]);
    }

    public function orderSave(Request $request) {
        $lensaData = Lensa::findOrFail($request->lensa);
        $frameData = Frame::findOrFail($request->frame);

        $orderData = new Transaction;

        $orderData->frame_id = $request->frame;
        $orderData->lensa_id = $request->lensa;
        $orderData->name = $request->name;
        $orderData->age = $request->umur;
        $orderData->address = $request->address;
        $orderData->lensa_price = $lensaData->price;
        $orderData->frame_price = $frameData->price;
        $orderData->grand_total = intval($frameData->price) + intval($lensaData->price);

        $image = $request->file('image');
        $file_name = 
        $this->generateRandomString().'.'.$image->getClientOriginalExtension();
        $orderData->img_doc = $file_name;
        $image->move(public_path().'/image/',$file_name);

        $orderData->save();

        if (\Auth::user()) {
            return redirect()->route('orderIndex')->with('status', 'Pemesanan berhasil disimpan.');
        } else {
            return redirect()->route('detailOrderIndex', $orderData->id);
        }
    }

    public function detailOrderIndex($id) {
        $orderData = Transaction::with('frame', 'lensa')->where('id', $id)->first();
        $aboutData = About::first();
        
        $orderData->lensa_price = $this->numberFormat($orderData->lensa_price);
        $orderData->frame_price = $this->numberFormat($orderData->frame_price);
        $orderData->grand_total = $this->numberFormat($orderData->grand_total);

        return view('detailorder', ['orderData' => $orderData, 'bank' => $aboutData->bank, 'no_rek' => $aboutData->no_rek]);
    }

    public function mataMinus() {
        return view('mataminus');
    }

    public function mataPlus() {
        return view('mataplus');
    }

    //Section Custom Function
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function numberFormat($angka){
	
        $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');

        return $hasil_rupiah;
    }
}
