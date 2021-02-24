# mdconverter

## これはなに?
MarkdownとHTMLを相互変換します。

<blockquote class="twitter-tweet"><p lang="ja" dir="ltr">MarkdownとHTMLの相互変換ツール作った。便利。 <a href="https://t.co/WDbGkvS86y">pic.twitter.com/WDbGkvS86y</a></p>&mdash; たっくん (@mikuta0407) <a href="https://twitter.com/mikuta0407/status/1364479043056275461?ref_src=twsrc%5Etfw">February 24, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

## 別途必要なもの
1. composer (https://getcomposer.org/download/ のCommand-line installationをコピペでインストール可能)
2. parsedown(composerでインストール。後述)
3. Markdownify(composerでインストール。後述)

## インストール方法

1. 適当なWebサーバー内のディレクトリに配置
2. mdconverterディレクトリ内で以下のコマンドを入力してpasedownとMarkdownifyをインストール
    
    ```bash
    php composer.phar require erusev/parsedown
    php composer.phar require pixel418/markdownify
    ```
3. mdconverter.phpにアクセス

