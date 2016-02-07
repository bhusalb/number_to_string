<form>
<input type="text" name="input-string">
<button>post</button>
</form>

<?php

function number_to_string($number)
{
    $oneth = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
    $tenth = ['', '1' => ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'], 'Twenty', 'Thirty', 'Fourty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    $xx = ['only', 'thousand', 'million', 'billion', 'Trillion'];

    while ($number != 0) {
        $num[] = $number % 10;
        $number = (int) ($number / 10);
    }

    //$num = array_reverse($num);
    $string = '';
    for ($i = 0, $j = 0, $k = 0; $i < count($num); $i++) {
        if ($j == 0) {
            $string = $xx[$k++] . ' ' . $string;
        }

        if (isset($num[$i + 1]) && $j == 0) {
            $temp = $num[$i + 1] * 10 + $num[$i];
            if ($temp > 9 && $temp < 20) {
                $string = $tenth[1][$num[$i]] . ' ' . $string;
            } else {
                $string = $tenth[$num[$i + 1]] . ' ' . $oneth[$num[$i]] . ' ' . $string;
            }

            $j = $j + 2;
            $i++;
        } elseif ($j == 0) {
            $string = $oneth[$num[$i]] . ' ' . $string;
            $j++;
        } else {
            if ($num[$i] != 0) {
                $string = $oneth[$num[$i]] . ' hundred ' . $string;
            }

            $j++;
        }

        if ($j == 3) {
            $j = 0;
        }

    }

    echo ($string);

}

if (isset($_GET['input-string']) && !empty($_GET['input-string'])) {
    number_to_string($_GET['input-string']);
}
