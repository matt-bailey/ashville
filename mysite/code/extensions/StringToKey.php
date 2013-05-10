<?php
class StringToKey extends Extension
{
    /**
     * Return StringToKey
     *
     * @return string
     */
    public function StringToKey()
    {
        if (!$this->owner instanceof Varchar) {
            return false;
        }

        $title = $this->owner->value;
        if ($title != null) {
            return $this->convertString($title);
            // var_dump($this->convertString($title));
        } else {
            return false;
        }
    }

    /**
     * Convert string to lowercase and replace spaces with hyphens
     *
     * @return string
     */
    protected function convertString($string)
    {
        // Lower case everything
        $string = strtolower($string);
        // Make alphaunermic
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        // Clean multiple dashes or whitespace
        $string = preg_replace("/[\s-]+/", " ", $string);
        // Convert whitespace and underscores to hyphens
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}
