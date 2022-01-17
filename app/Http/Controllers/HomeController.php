<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{

    public function index(): View
    {
        return view('welcome');
    }

    public function feed(): JsonResponse
    {
        $feedContent = [
            [
                'name' => 'Test Name 1',
                'id' => 21000,
                'type' => 'one',
                'content' => '<content xmlns:xlink=\"http://www.w3.org/1999/xlink\" ><strapline>This is Strapline</strapline><headline><bold>This
                            is Main Heading</bold></headline><body><paragraph>this is Subtitle</paragraph></body><pos1><picture alt-text=\"\" seo-title=\"\"
                            xlink:href=\"https://qr1.at/img/webhook.png"/><headline><bold>Section 1:</bold></headline><subline>section subtitle</subline><body>
                            <bullet-list><item><paragraph>first bullet point</paragraph></item><item><paragraph>2nd bullet point</paragraph></item</bullet-list>
                            </body></pos1></content>',
            ],
            [
                'name' => 'Test Name 2',
                'id' => 21001,
                'type' => 'tow',
                'content' => "leben"
            ]
        ];

        $content = '';
        foreach ($feedContent as $feed) {
            if ($feed['type'] == 'one') {
                $content = $feed['content'];
                break;
            }
        }

        $search  = ['=\\', 'xlink\\', 'xlink:href', 'bullet-list', '</item<'];
        $replace = ['=', 'xlink', 'src', 'bulletList', '</item><'];
        $content = trim(preg_replace('/\s+/', ' ', str_replace($search, $replace, $content)));

        return response()->json(['status' => true, 'result' => simplexml_load_string($content)]);

    }
}
