<?php

namespace GeekCms\Content\Http\Controllers;

use GeekCms\Content\Models\ContentModel;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index($type)
    {
        if ($content = getContentByType($type)) {
            return view($content::$viewList, [
                'content' => $content,
                'items' => $content->getItems(),
            ]);
        }

        return abort(404);
    }

    public function edit($type, $item)
    {
        if ($content = getContentByType($type)) {
            $item = ContentModel::where('type', $type)
                ->where('id', $item)
                ->first();

            $form = $content->form($item);

            if ($item) {
                return view($content::$viewEdit, [
                    'form' => $form,
                ]);
            }
        }

        return abort(404);
    }
}
