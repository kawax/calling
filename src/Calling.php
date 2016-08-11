<?php

namespace Revolution\Calling;

class Calling
{
    /**
     * @var array
     */
    protected $number = [];

    /**
     * Calling constructor.
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     *
     */
    protected function load()
    {
        $base = json_decode(file_get_contents(__DIR__ . '/../data/base.json'), true);

        $num = json_decode(file_get_contents(__DIR__ . '/../data/number.json'), true);

        $this->number = array_merge($base, $num);
    }

    /**
     * @param string $tel
     *
     * @return string
     */
    public function area($tel)
    {
        $tel = preg_replace('/[^\d]/', '', $tel);

        if (empty($tel)) {
            return '';
        }

        for ($i = 5; $i >= 2; $i--) {
            $area = $this->search(substr($tel, 0, $i));
            if (!empty($area)) {
                return trim($area);
                break;
            }
        }

        return '';
    }

    /**
     * @param string $tel
     *
     * @return string
     */
    protected function search($tel)
    {
        if (array_key_exists($tel, $this->number)) {
            return $this->number[$tel];
        }

        return '';
    }

    /**
     * @param array $number
     */
    public function setNumber(array $number)
    {
        $this->number = $number;
    }

    /**
     * @return array
     */
    public function getNumber()
    {
        return $this->number;
    }

}
