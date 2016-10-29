<?php
$accessToken = getenv('LINE_CHANNEL_ACCESS_TOKEN');


//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$jsonObj = json_decode($json_string);

$type = $jsonObj->{"events"}[0]->{"message"}->{"type"};
//メッセージ取得
$text = $jsonObj->{"events"}[0]->{"message"}->{"text"};
//ReplyToken取得
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

//メッセージ以外のときは何も返さず終了
if($type != "text"){
	exit;
}

//返信データ作成
if ($text == 'はい') {
  $response_format_text = [
    "type" => "template",
    "altText" => "ハンサムなジエンクンはいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/handsome_dienkun.png",
      "title" => "ハンサムなジエンクン",
      "text" => "この人にデートしたいですか",
      "actions" => [
          [
            "type" => "message",
            "label" => "デートする",
            "text" => "デートする"
          ],
          [
            "type" => "uri",
            "label" => "詳しく見る",
            "uri" => "https://www.facebook.com/dienkun"
          ],
          [
            "type" => "message",
            "label" => "違う人",
            "text" => "違う人"
          ]
      ]
    ]
  ];
} else if ($text == 'いいえ') {
  $response_format_text = [
    "type" => "template",
    "altText" => "うそ。本当のことを言ってください。（はい／いいえ）",
    "template" => [
        "type" => "confirm",
        "text" => "うそ。本当のことを言ってください。|(￣3￣)|",
        "actions" => [
            [
              "type" => "message",
              "label" => "はい",
              "text" => "はい"
            ],
            [
              "type" => "message",
              "label" => "いいえ",
              "text" => "いいえ"
            ]
        ]
    ]
  ];
} else if ($text == '違う人') {
  $response_format_text = [
    "type" => "template",
    "altText" => "３人ご案内しています。",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/kind_dienkun.jpg",
            "title" => "優しいジエンクン",
            "text" => "この人にデートしますか？",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "デートする",
                  "text" => "デートする"
              ],
              [
                  "type" => "uri",
                  "label" => "詳しく見る（ブラウザ起動）",
                  "uri" => "https://www.facebook.com/dienkun"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/cute_dienkun.jpg",
            "title" => "かわいいジエンクン",
            "text" => "それともこの人？",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "デートする",
                  "text" => "デートする"
              ],
              [
                  "type" => "uri",
                  "label" => "詳しく見る（ブラウザ起動）",
                  "uri" => "https://www.facebook.com/dienkun"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/funny_dienkun.jpg",
            "title" => "面白いジエンクン",
            "text" => "はたまたこの人？",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "デートする",
                  "text" => "デートする"
              ],
              [
                  "type" => "uri",
                  "label" => "詳しく見る（ブラウザ起動）",
                  "uri" => "https://www.facebook.com/dienkun"
              ]
            ]
          ]
      ]
    ]
  ];
} else if ($text == 'デートする') {
  $response_format_text = [
    "type" => "template",
    "altText" => "うそ。本当のことを言ってください。（はい／いいえ）",
    "template" => [
        "type" => "message",
        "text" => "デートしてくれ、ありがとうございました！！ランチのデートをジエンクンのカレンダーに入れてくださいね*･゜ﾟ･*:.｡..｡.:*･'(*ﾟ▽ﾟ*)'･*:.｡. .｡.:*･゜ﾟ･*"        
    ]
  ];
} else if ($text == 'ハンサムなジエンクン') {
  $response_format_text = [
    "type" => "template",
    "altText" => "ハンサムなジエンクンはいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/handsome_dienkun.png",
      "title" => "ハンサムなジエンクン",
      "text" => "この人にデートしたいですか",
      "actions" => [
          [
            "type" => "message",
            "label" => "デートする",
            "text" => "デートする"
          ],
          [
            "type" => "uri",
            "label" => "詳しく見る",
            "uri" => "https://www.facebook.com/dienkun"
          ]    
      ]
    ]
  ];
}else if ($text == '優しいジエンクン') {
  $response_format_text = [
    "type" => "template",
    "altText" => "優しいジエンクンはいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/kind_dienkun.jpg",
      "title" => "優しいジエンクン",
      "text" => "この人にデートしたいですか",
      "actions" => [
          [
            "type" => "message",
            "label" => "デートする",
            "text" => "デートする"
          ],
          [
            "type" => "uri",
            "label" => "詳しく見る",
            "uri" => "https://www.facebook.com/dienkun"
          ]    
      ]
    ]
  ];
}else if ($text == 'かわいいジエンクン') {
  $response_format_text = [
    "type" => "template",
    "altText" => "かわいいジエンクンはいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/cute_dienkun.jpg",
      "title" => "かわいいジエンクン",
      "text" => "この人にデートしたいですか",
      "actions" => [
          [
            "type" => "message",
            "label" => "デートする",
            "text" => "デートする"
          ],
          [
            "type" => "uri",
            "label" => "詳しく見る",
            "uri" => "https://www.facebook.com/dienkun"
          ]    
      ]
    ]
  ];
}else if ($text == '面白いジエンクン') {
  $response_format_text = [
    "type" => "template",
    "altText" => "面白いジエンクンはいかがですか？",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/funny_dienkun.jpg",
      "title" => "面白いジエンクン",
      "text" => "この人にデートしたいですか",
      "actions" => [
          [
            "type" => "message",
            "label" => "デートする",
            "text" => "デートする"
          ],
          [
            "type" => "uri",
            "label" => "詳しく見る",
            "uri" => "https://www.facebook.com/dienkun"
          ]    
      ]
    ]
  ];
}else {
  $response_format_text = [
    "type" => "template",
    "altText" => "私のことが好きですか？（はい／いいえ）",
    "template" => [
        "type" => "confirm",
        "text" => "私のことが好きですか",
        "actions" => [
            [
              "type" => "message",
              "label" => "はい",
              "text" => "はい"
            ],
            [
              "type" => "message",
              "label" => "いいえ",
              "text" => "いいえ"
            ]
        ]
    ]
  ];
}

$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];

$ch = curl_init("https://api.line.me/v2/bot/message/reply");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
    ));
$result = curl_exec($ch);
curl_close($ch);
