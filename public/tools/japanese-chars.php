<?php

function eucjp_to_utf16literal($euc) {
    $utf16 = mb_convert_encoding($euc,"UTF-16BE","EUC-JP");
    if ($euc == mb_convert_encoding($utf16,"EUC-JP", "UTF-16BE")) {
        return '\u' . bin2hex($utf16);
    }
}

// ひらがな（4区）
echo '  HIRAGANA: "';
for ($c1 = 0xa4, $c2 =0xa1; $c2 <= 0xfe; $c2++) {
    echo eucjp_to_utf16literal(sprintf("%c%c", $c1, $c2));
}
echo '",', "\n\n";

// カタカナ（5区）
echo '  KATAKANA: "';
for ($c1 = 0xa5, $c2 =0xa1; $c2 <= 0xfe; $c2++) {
    echo eucjp_to_utf16literal(sprintf("%c%c", $c1, $c2));
}
echo '",', "\n\n";

// ギリシア文字（6区）
echo '  GREEK: "';
for ($c1 = 0xa6, $c2 =0xa1; $c2 <= 0xfe; $c2++) {
    echo eucjp_to_utf16literal(sprintf("%c%c", $c1, $c2));
}
echo '",', "\n\n";

// キリル文字（7区）
echo '  CYRILLIC: "';
for ($c1 = 0xa7, $c2 =0xa1; $c2 <= 0xfe; $c2++) {
    echo eucjp_to_utf16literal(sprintf("%c%c", $c1, $c2));
}
echo '",', "\n\n";

// 漢字（JIS第一水準, 16-47区）
echo '  KANJI: "';
for ($c1 = 0xb0; $c1 <= 0xcf; $c1++) {
    for ($c2 =0xa1; $c2 <= 0xfe; $c2++) {
        echo eucjp_to_utf16literal(sprintf("%c%c", $c1, $c2));
    }
}
echo '",', "\n";
