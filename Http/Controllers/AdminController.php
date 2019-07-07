<?php

namespace Modules\Content\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Content\Models\ContentModel;

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

        abort(404);
    }

    public function edit($type, $item)
    {
        if ($content = getContentByType($type)) {
            $item = ContentModel::where('type', $type)
                ->where('id', $item)
                ->first()
            ;

            $form = $content->form($item);

            if ($item) {
                return view($content::$viewEdit, [
                    'form' => $form,
                ]);
            }
        }

        abort(404);
    }
}
