<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Place;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Log;

class ContentsController extends Controller
{
    public static $prefs = ['01' => '北海道', '02' => '青森県', '03' => '岩手県', '04' => '宮城県', '05' => '秋田県',
    '06' => '山形県', '07' => '福島県', '08' => '茨城県', '09' => '栃木県', '10' => '群馬県',
    '11' => '埼玉県', '12' => '千葉県', '13' => '東京都', '14' => '神奈川県', '15' => '新潟県',
    '16' => '富山県', '17' => '石川県', '18' => '福井県', '19' => '山梨県', '20' => '長野県',
    '21' => '岐阜県', '22' => '静岡県', '23' => '愛知県', '24' => '三重県', '25' => '滋賀県',
    '26' => '京都府', '27' => '大阪府', '28' => '兵庫県', '29' => '奈良県', '30' => '和歌山県',
    '31' => '鳥取県', '32' => '島根県', '33' => '岡山県', '34' => '広島県', '35' => '山口県',
    '36' => '徳島県', '37' => '香川県', '38' => '愛媛県', '39' => '高知県', '40' => '福岡県',
    '41' => '佐賀県', '42' => '長崎県', '43' => '熊本県', '44' => '大分県', '45' => '宮崎県',
    '46' => '鹿児島県', '47' => '沖縄県'];

    public static $cities01 =
   //北海道
    ['1' => '札幌市', '2' => '函館市', '3' => '小樽市', '4' => '旭川市', '5' => '室蘭市',
    '6' => '釧路市', '7' => '帯広市', '8' => '北見市', '9' => '夕張市', '10' => '岩見沢市',
    '11' => '網走市', '12' => '留萌市', '13' => '苫小牧市', '14' => '稚内市', '15' => '美唄市',
    '16' => '芦別市', '17' => '江別市', '18' => '赤平市', '19' => '紋別市', '20' => '士別市',
    '21' => '名寄市', '22' => '三笠市', '23' => '根室市', '24' => '千歳市', '25' => '滝川市',
    '26' => '砂川市', '27' => '歌志内市', '28' => '深川市', '29' => '富良野市', '30' => '登別市',
    '31' => '恵庭市', '32' => '伊達市', '33' => '北広島市', '34' => '石狩市', '35' => '北斗市',
    '36' => '当別町', '37' => '新篠津村', '38' => '松前町', '39' => '福島町', '40' => '知内町',
    '41' => '木古内町', '42' => '七飯町', '43' => '鹿部町', '44' => '森町', '45' => '八雲町',
    '46' => '長万部町', '47' => '江差町', '48' => '上ノ国町', '49' => '厚沢部町', '50' => '乙部町',
    '51' => '奥尻町', '52' => '今金町', '53' => 'せたな町', '54' => '島牧村', '55' => '寿都町',
    '56' => '黒松内町', '57' => '蘭越町', '58' => 'ニセコ町', '59' => '真狩村', '60' => '留寿都村',
    '61' => '喜茂別町', '62' => '京極町', '63' => '倶知安町', '64' => '共和町', '65' => '岩内町',
    '66' => '泊村', '67' => '神恵内村', '68' => '積丹町', '69' => '古平町', '70' => '仁木町',
    '71' => '余市町', '72' => '赤井川村', '73' => '南幌町', '74' => '奈井江町', '75' => '上砂川町',
    '76' => '由仁町', '77' => '長沼町', '78' => '栗山町', '79' => '月形町', '80' => '浦臼町',
    '81' => '新十津川町', '82' => '妹背牛町', '83' => '秩父別町', '84' => '雨竜町', '85' => '北竜町',
    '86' => '沼田町', '87' => '鷹栖町', '88' => '東神楽町', '89' => '当麻町', '90' => '比布町',
    '91' => '愛別町', '92' => '上川町', '93' => '東川町', '94' => '美瑛町', '95' => '上富良野町',
    '96' => '中富良野町', '97' => '南富良野町', '98' => '占冠村', '99' => '和寒町', '100' => '剣淵町',
    '101' => '下川町', '102' => '美深町', '103' => '音威子府村', '104' => '中川町', '105' => '幌加内町',
    '106' => '増毛町', '107' => '小平町', '108' => '苫前町', '109' => '羽幌町', '110' => '初山別村',
    '111' => '遠別町', '112' => '天塩町', '113' => '猿払村', '114' => '浜頓別町', '115' => '中頓別町',
    '116' => '枝幸町', '117' => '豊富町', '118' => '礼文町', '119' => '利尻町', '120' => '利尻富士町',
    '121' => '幌延町', '122' => '美幌町', '123' => '津別町', '124' => '斜里町', '125' => '清里町',
    '126' => '小清水町', '127' => '訓子府町', '128' => '置戸町', '129' => '佐呂間町', '130' => '遠軽町',
    '131' => '湧別町', '132' => '滝上町', '133' => '興部町', '134' => '西興部町', '135' => '雄武町',
    '136' => '大空町', '137' => '豊浦町', '138' => '壮瞥町', '139' => '白老町', '140' => '厚真町',
    '141' => '洞爺湖町', '142' => '安平町', '143' => 'むかわ町', '144' => '日高町', '145' => '平取町',
    '146' => '新冠町', '147' => '浦河町', '148' => '様似町', '149' => 'えりも町', '150' => '新ひだか町',
    '151' => '音更町', '152' => '士幌町', '153' => '上士幌町', '154' => '鹿追町', '155' => '新得町',
    '156' => '清水町', '157' => '芽室町', '158' => '中札内村', '159' => '更別村', '160' => '大樹町',
    '161' => '広尾町', '162' => '幕別町', '163' => '池田町', '164' => '豊頃町', '165' => '本別町',
    '166' => '足寄町', '167' => '陸別町', '168' => '浦幌町', '169' => '釧路町', '170' => '厚岸町',
    '171' => '浜中町', '172' => '標茶町', '173' => '弟子屈町', '174' => '鶴居村', '175' => '白糠町',
    '176' => '別海町', '177' => '中標津町', '178' => '標津町', '179' => '羅臼町'];

    public static $cities02 =
    ['1' => '青森市', '2' => '弘前市', '3' => '八戸市', '4' => '黒石市', '5' => '五所川原市',
    '6' => '十和田市', '7' => '三沢市', '8' => 'むつ市', '9' => 'つがる市', '10' => '平川市',
    '11' => '平内町', '12' => '今別町', '13' => '蓬田村', '14' => '外ヶ浜町', '15' => '鰺ヶ沢町',
    '16' => '深浦町', '17' => '西目屋村', '18' => '藤崎町', '19' => '大鰐町', '20' => '田舎館村',
    '21' => '板柳町', '22' => '鶴田町', '23' => '中泊町', '24' => '野辺地町', '25' => '七戸町',
    '26' => '六戸町', '27' => '横浜町', '28' => '東北町', '29' => '六ケ所村', '30' => 'おいらせ町',
    '31' => '大間町', '32' => '東通村', '33' => '風間浦村', '34' => '佐井村', '35' => '三戸町',
    '36' => '五戸町', '37' => '田子町', '38' => '南部町', '39' => '階上町', '40' => '新郷村'];
    //トップページを表示する
    public function top()
    {
        return view('contents.top');
    }
    //記事の一覧を表示する
    public function content()
    {
        $places = Place::all();
        $places = Place::paginate(5);

        return view('contents.content', ['places' => $places]);
    }

    //記事の編集画面を表示する
    public function edit($id, Place $place)
    {
        //Placeテーブルから取得したidに合致するデータを取得
        $place = Place::find($id);
        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }
//    if ($place->user_id !== Auth::user()->id) {
//        return response(redirect(url('/notfound')), 404);
//    }
        return view('contents.edit', [
      'place_form' => $place,
      'id' => $id
    ]);
    }

    //記事のデータの上書をする
    public function update(CreateContentRequest $request, $id, Place $place)
    {
        $place_form = $request->all();
        $place = Place::place();
        //不要な「_token」の削除
        unset($place_form['_token']);
        //保存
        $place->fill($place_form)->save();
        //リダイレクト
        return redirect('contents/show', ['place' => $place])->with('edit_content_success', '編集しました');
    }

    //記事を削除する
    public function delete($id, Place $place)
    {
        // 該当する記事を取得
        $place = Place::find($id);
        //idが一致しなければエラー画面を表示
        if (null === $place) {
            return response(redirect(url('/notfound')), 404);
        }
        //削除する記事に画像ファイルがあったら
        if (null !== $place->datafile) {
            //サーバー上の画像を削除する
            //ファイルパスからファイル名を取得
            //storage/images/{$place->user_id}/{$place_id}/{$file_name}
            $file_pass = $place->datafile;
            $file_passes = explode('/', $file_pass);
            //配列の5つ目($file_name)を取得
            $del_file_name = $file_passes[4];
            //配列の4つ目($Place_idに代入してあるtime()の投稿時間)を取得
            $place_id = $file_passes[3];
            //public/images/{$place->user_id}/{$place_id}から画像ファイルを削除する
            Storage::delete("public/images/{$place->user_id}/{$place_id}/" . $del_file_name);
            //投稿時間フォルダも削除する
            Storage::deleteDirectory("public/images/{$place->user_id}/" . $place_id);
            // データベースのレコードを削除する
            $place->delete();
        } else {
            // なければそのままデータベースのレコードを削除する
            $place->delete();
        }

        return redirect('contents/content')->with('delete_content_success', '削除しました');
    }

    //エリアで探すページを表示する
    public function mapshow()
    {
        return view('contents.map', ['prefs' => self::$prefs]);
    }
    //新規投稿画面を表示する
    //→CreateContentController.php内に記述

    //記事詳細画面を表示する
    public function show()
    {
        return view('contents.show');
    }

    //public static $cities = ['01' =>$cities01];
  //  public function content() {
  //  return view('contents.content', ['prefs' => self::$prefs, 'cities' => self::$cities]);
  //}

  /**
   * public function testContent() {
   *  return view('contents.testContent', ['prefs' => self::$prefs]);
   * }
   */
}
