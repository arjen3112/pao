<?php
class formbuilder {
    private $output;
    public $check;

    public function __construct() {
    }

    public function pregmatch($name, $pattern) {
        $this -> output = '<input name="' . $name . '" type="text" ';
        if (isset($_POST[$name])) {
            $this -> output .= " value=\"" . $_POST[$name] . "\"";
            if (!preg_match($pattern, $_POST[$name])) {
                $this -> output .= "style=\"border:2px solid red;\" ";
                $this -> check = 1;
            }
        }
        $this -> output .= '/>';
        return $this -> output;
    }

}

?>