# php-one-file-uploader

PHPを実行できるディレクトリに置いて、クライアントのディレクトリをまるっと上げてしまうファイルです。  
上げたいディレクトリを選択して、ボタンを押すだけで選択したディレクトリをWebサーバに上げることができます。  
もちろんディレクトリ構成は維持できます。  


これを実装した感じです。  
- https://qiita.com/akase244/items/f5f7287cfe28bebe00fc

その他に参考にしたサイトです。  
- http://www.isl.ne.jp/pcsp/php/contents_10.html
- http://raining.bear-life.com/javascript/javascript%E3%81%A7post%E3%81%AE%E5%80%A4%E3%82%92%E8%BF%BD%E5%8A%A0%E3%81%99%E3%82%8B


実験的に作っただけで、パスワードも入れないで入れるし、いろいろ考えるべきところはあります。  
問題点や注意点を書いておきますね。  

- ログイン制御がない。  
- PHPを実行できるフォルダに置かないといけない。  
- このファイルを置いた場所にしかアップロードできない。  
- php.iniの最大サイズやファイル数の上限などの設定値に制限される。たぶんファイルが多すぎると上がらない。  
- 結局、このファイルは何らかの方法で上げないといけない。  

所詮、ほとんど上のリンクのサイトからパクってきたようなものなので、部分的にでも使えるものなら使ってやってください。
