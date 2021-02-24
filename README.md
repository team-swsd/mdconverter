# mdconverter

## これはなに?
MarkdownとHTMLを相互変換します。

![](https://pbs.twimg.com/media/Eu-aVdBVIAM2-we?format=png&name=small)
![](https://pbs.twimg.com/media/Eu-aZeKVIAAOf37?format=png&name=small)

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

