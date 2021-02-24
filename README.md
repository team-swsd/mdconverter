# mdconverter

## これはなに?
MarkdownとHTMLを相互変換します。

![](https://i.imgur.com/POn6Kt8.png)

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
3. index.phpにアクセス

## 他にお世話になったもの
シンタックスハイライト: CodeMirror (https://codemirror.net/)
PHPでHTMLからMDにする方法について: 「PHP で日本語を含む HTML から Markdown に変換する方法」http://www.sharkpp.net/blog/2015/07/05/how-to-japanese-html-to-markdown-in-php.html

Copyright (c) 2021 mikuta0407
Released under the MIT license
https://opensource.org/licenses/mit-license.php

CodeMirror, copyright (c) by Marijn Haverbeke and others
Distributed under an MIT license: https://codemirror.net/LICENSE

Sculpin© 2004-2021 sharkpp
Distributed under an MIT license: https://opensource.org/licenses/mit-license.php