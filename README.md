# アプリの概要
飲食店検索サイトです。

「場所」と「キーワード」を入力することで、「場所」付近の「キーワード」が関連する飲食店を評価順のランキングで表示します。
マップ上で上位五件の店の位置を表示します
![aprigazou]( https://github.com/Fuijta21/shokuranking1/assets/108111167/5dc8504a-91aa-407a-bedb-70fee0b4b187)　　
## URL
(https://arcane-caverns-52762-80d6276f260a.herokuapp.com/)
 
 アカウントを作成後利用できるようになります。

 メールアドレスやパスワードは適当でも大丈夫です。

# 使用技術
* PHP
* HTML
* CSS
* JavaScript
* Laravel
* AWS
* Breeze
* Heroku
* MariaDB
* Google Maps API
* yelp API
* TailWind

# 機能
* ユーザ登録、ログイン機能
* プロフィールの編集機能
* 飲食店検索機能
* 星評価システム
* 飲食店マップ表示機能

# 注力・工夫点
## 工夫点1　飲食店のランキング表示
店舗を検索し評価を取得するため、外部飲食店サイトのAPI(yelp)を利用した。店の情報を取得する際に、店の場所やキーワードから店の検索を行えるようにした。評価数が多く評価が高い店をランキング形式で表示したかったためyelpから「指定場所」に近く「キーワード」に関する店を評価数順に10件取得しその中で評価を比較しランキング形式で出力できるようにした。

## 工夫点2 ランキング上位のマップ表示
ランキング上位5件の店の位置をGoogleMapに表示できるようにした。また、マップ上のピンにカーソルを合わせることでどの店のピンなのかを分かるようにした。

## 工夫点3 店の住所表示
yelpは海外のサイトであるため、apiから得られたデータでは住所が日本語表記で表示されない。そのため、データ内の緯度と経度の情報からgoogle map api のリバースジオコーディングを行い、住所を日本語の正しい表記で表示できるようにした。

## 工夫点4　評価の星表示
店の評価をyelpから取得する際、評価は0~5までの数値で与えられる。本サイトでは評価を星で表示しわかりやすくした。cssの'content'プロパティをつかい★★★★★をデフォルト表示とし、評価の値に対応するように表示する幅を設定し、星評価システムを実現した。

## 工夫点5　ログイン機能とプロフィールの編集
Breezeを用いてログイン機能を実装した。また、ユーザー毎にプロフィールを設定し、編集できるようにした。また、編集では性別の選択をプルダウンリストを用いて選択できるようにした。紹介文では長い文章に対応するために'textarea'を使用して、端で入力が折り返すようにした。


