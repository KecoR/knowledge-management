<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Tblknowledge;
use App\TblknowledgeChild;
use App\TblknowledgeInfo;
use App\TblknowledgeContent;
use App\Tblrequest;

class KnowledgeController extends Controller
{
    public function index()
    {
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.index', ['knowledges' => $knowledge]);
    }

    public function info($id)
    {
        $info = TblknowledgeInfo::where('child_id', $id)->get();
        $child = TblknowledgeChild::where('id', $id)->first();
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.info', ['knowledges' => $knowledge, 'infos' => $info, 'child' => $child]);
    }

    public function content($id)
    {
        $content = TblknowledgeContent::where('info_id', $id)->first();
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.content', ['content' => $content, 'knowledges' => $knowledge]);
    }

    public function add()
    {
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.add.index', ['knowledges' => $knowledge]);
    }

    public function getFungsi($id)
    {
       $fungsi = TblknowledgeChild::where('knowledge_id', $id)->get();
       
       return $fungsi;
    }

    public function save(Request $request)
    {
        $cekKnowledge = $request->get('knowledge');
        $fungsi = $request->get('child');
        $info = $request->get('info');
        $content = $request->get('content');
        
        if($cekKnowledge == "new") {
            $knowledge = $request->get('newcat');
            $child = $request->get('fungsi');
            
            $new_knowledge = new Tblknowledge;
            $new_knowledge->knowledge_name = $knowledge;
            $new_knowledge->save();

            $new_fungsi = new TblknowledgeChild;
            $new_fungsi->child_name = $child;
            $new_fungsi->knowledge_id = $new_knowledge->id;
            $new_fungsi->save();

            $new_info = new TblknowledgeInfo;
            $new_info->info_name = $info;
            $new_info->child_id = $new_fungsi->id;
            $new_info->save();

            $new_content = new TblknowledgeContent;
            $new_content->content = $content;
            $new_content->info_id = $new_info->id;
            $new_content->save();

            return redirect()->back()->with('status', 'Knowledge berhasil ditambah.');
        } else {
            if($fungsi == "newfungsi") {
                $newfungsi = $request->get('newchild');

                $new_fungsi = new TblknowledgeChild;
                $new_fungsi->child_name = $newfungsi;
                $new_fungsi->knowledge_id = $request->get('knowledge');
                $new_fungsi->save();

                $new_info = new TblknowledgeInfo;
                $new_info->info_name = $info;
                $new_info->child_id = $new_fungsi->id;
                $new_info->save();

                $new_content = new TblknowledgeContent;
                $new_content->content = $content;
                $new_content->info_id = $new_info->id;
                $new_content->save();

                return redirect()->back()->with('status', 'Knowledge berhasil ditambah.');
            } else {
                $new_info = new TblknowledgeInfo;
                $new_info->info_name = $info;
                $new_info->child_id = $fungsi;
                $new_info->save();

                $new_content = new TblknowledgeContent;
                $new_content->content = $content;
                $new_content->info_id = $new_info->id;
                $new_content->save();

                return redirect()->back()->with('status', 'Knowledge berhasil ditambah.');
            }
        }
    }

    public function ask()
    {
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.ask.index', ['knowledges' => $knowledge]);
    }

    public function saveAsk(Request $request)
    {
        $req = new Tblrequest;
        $req->user_id = \Auth::user()->id;

        if($request->get('knowledge') == "new") {
            $req->knowledge_parent_name = $request->get('newcat');
            $req->knowledge_child_name = $request->get('fungsi');
        } else {
            $req->knowledge_parent_id = $request->get('knowledge');
        }

        if($request->get('child') == "newfungsi") {
            $req->knowledge_child_name = $request->get('newchild');
        } else {
            $req->knowledge_child_id = $request->get('child');
        }

        $req->info_name = $request->get('info');
        $req->content = $request->get('content');
        $req->tgl_request = Carbon::now();
        $req->status = '0';
        $req->save();

        return redirect()->back()->with('status', 'Knowledge berhasil disimpan, mohon tunggu konfirmasi dari admin.');

    }

    public function requestList()
    {
        $req = Tblrequest::with('kategori','child','user')->get();
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.request.index', ['reqs' => $req, 'knowledges' => $knowledge]);
    }

    public function requestDetail($id)
    {
        $req = Tblrequest::with('kategori','child','user')->where('id', $id)->first();
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.request.detail', ['req' => $req, 'knowledges' => $knowledge]);
    }

    public function requestTerima(Request $request)
    {
        $cat = $request->get('cat_id');
        $fungsi = $request->get('fungsi_id');
        $info = $request->get('info');
        $content = $request->get('content');
        $newfungsi = $request->get('fungsi');

        if(!empty($cat)){
            if(!empty($fungsi)) {
                $new_info = new TblknowledgeInfo;
                $new_info->info_name = $info;
                $new_info->child_id = $fungsi;
                $new_info->save();

                $new_content = new TblknowledgeContent;
                $new_content->content = $content;
                $new_content->info_id = $new_info->id;
                $new_content->save();

                $id = $request->get('id');

                $req = Tblrequest::where('id', $id)->first();
                $req->tgl_accept = Carbon::now();
                $req->status = '1';
                $req->save();

                return redirect()->route('knowledge.requestList')->with('status', 'Knowledge berhasil diterima.');
            } else {
                $new_fungsi = new TblknowledgeChild;
                $new_fungsi->child_name = $newfungsi;
                $new_fungsi->knowledge_id = $cat;
                $new_fungsi->save();

                $new_info = new TblknowledgeInfo;
                $new_info->info_name = $info;
                $new_info->child_id = $new_fungsi->id;
                $new_info->save();

                $new_content = new TblknowledgeContent;
                $new_content->content = $content;
                $new_content->info_id = $new_info->id;
                $new_content->save();

                $id = $request->get('id');

                $req = Tblrequest::where('id', $id)->first();
                $req->tgl_accept = Carbon::now();
                $req->status = '1';
                $req->save();

                return redirect()->route('knowledge.requestList')->with('status', 'Knowledge berhasil diterima.');
            }
        } else {
            $knowledge = $request->get('cat');
            $child = $request->get('fungsi');
            
            $new_knowledge = new Tblknowledge;
            $new_knowledge->knowledge_name = $knowledge;
            $new_knowledge->save();

            $new_fungsi = new TblknowledgeChild;
            $new_fungsi->child_name = $child;
            $new_fungsi->knowledge_id = $new_knowledge->id;
            $new_fungsi->save();

            $new_info = new TblknowledgeInfo;
            $new_info->info_name = $info;
            $new_info->child_id = $new_fungsi->id;
            $new_info->save();

            $new_content = new TblknowledgeContent;
            $new_content->content = $content;
            $new_content->info_id = $new_info->id;
            $new_content->save();

            $id = $request->get('id');

            $req = Tblrequest::where('id', $id)->first();
            $req->tgl_accept = Carbon::now();
            $req->status = '1';
            $req->save();

            return redirect()->route('knowledge.requestList')->with('status', 'Knowledge berhasil diterima.');
        }
    }

    public function requestTolak($id)
    {
        Tblrequest::where('id', $id)->update(['status' => -1]);

        return redirect()->route('knowledge.requestList')->with('status', 'Knowledge berhasil di tolak.');
    }

    public function manage()
    {
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.manage.index', ['knowledges' => $knowledge]);
    }

    public function detailKnowledge($id)
    {
        $fungsi = TblknowledgeChild::where('knowledge_id', $id)->get();
        $knowledge = Tblknowledge::with('child')->get();

        return view('knowledge.manage.fungsi', ['fungsi' => $fungsi, 'knowledges' => $knowledge]);
    }

    public function detailKnowledgeInfo($id)
    {
        $info = TblknowledgeInfo::where('child_id', $id)->get();
        $knowledge = Tblknowledge::with('child')->get();
        
        return view('knowledge.manage.info', ['info' => $info, 'knowledges' => $knowledge]);
    }

    public function deleteKnowledgeCat($id)
    {
        $knowledge = Tblknowledge::where('id', $id)->first();

        $knowledge->delete();

        return redirect()->back()->with('status', 'Fungsi berhasil dihapus.');
    }

    public function deleteKnowledgeFungsi($id)
    {
        $fungsi = TblknowledgeChild::where('id', $id)->first();

        $fungsi->delete();

        return redirect()->back()->with('status', 'Fungsi berhasil dihapus.');
    }

    public function deleteKnowledgeInfo($id)
    {
        $info = TblknowledgeInfo::where('id', $id)->first();

        $info->delete();

        return redirect()->back()->with('status', 'Informasi berhasil dihapus.');
    }

    public function getKnowledge($id)
    {
        $knowledge = Tblknowledge::where('id', $id)->first();

        return $knowledge;
    }

    public function knowledgeSave(Request $request)
    {
        $id = $request->get('knowledge_id');

        $edit = Tblknowledge::where('id', $id)->first();

        $edit->knowledge_name = $request->get('kategori');

        $edit->save();

        return redirect()->back()->with('status', 'Knowledge berhasil di update');

    }

    public function getChild($id)
    {
        $child = TblknowledgeChild::where('id', $id)->first();

        return $child;
    }

    public function childSave(Request $request)
    {
        $id = $request->get('fungsi_id');

        $edit = TblknowledgeChild::where('id', $id)->first();

        $edit->child_name = $request->get('fungsi');
        $edit->knowledge_id = $request->get('kategori');

        $edit->save();

        return redirect()->back()->with('status', 'Fungsi berhasil di update');
    }

    public function getInfo($id)
    {
        $info = TblknowledgeInfo::where('id', $id)->first();
        $content = TblknowledgeContent::where('info_id', $id)->first();

        $data = array(
            'info' => $info,
            'content' => $content
        );

        return $data;
    }

    public function infoSave(Request $request)
    {
        $id = $request->get('info_id');

        $info = TblknowledgeInfo::where('id', $id)->first();

        $info->info_name = $request->get('info');

        $info->save();

        $content = TblknowledgeContent::where('info_id', $id)->first();

        $content->content = $request->get('content');

        $content->save();

        return redirect()->back()->with('status', 'Informasi berhasil di update');

    }

    public function test()
    {
        $knowledge = Tblrequest::with('kategori','child','user')->get();

        return $knowledge;
    }
}
