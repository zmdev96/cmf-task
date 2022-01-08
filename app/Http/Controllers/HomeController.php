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
                'content' => '<?xml version="1.0" encoding="UTF-8"?>
                             <content>
                                    <strapline>This is Strapline</strapline>
                                    <headline><bold>This is Main Heading</bold></headline>
                                    <body><paragraph>this is Subtitle</paragraph></body>
                                    <pos1>
                                        <picture href="https://qr1.at/img/webhook.png" />
                                        <headline><bold>Section 1:</bold></headline>
                                        <subline>section subtitle</subline>
                                        <body>
                                            <bulletList>
                                            <item>
                                             <paragraph>first bullet point</paragraph>
                                            </item>
                                            <item>
                                             <paragraph>2nd bullet point</paragraph>
                                            </item>
                                            </bulletList>
                                        </body>
                                    </pos1>
                               </content>'
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
                $content = simplexml_load_string($feed['content']);
                break;
            }
        }

        return response()->json(['status' => true, 'result' => $content]);

    }
}
