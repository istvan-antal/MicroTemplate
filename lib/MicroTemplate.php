<?php
/*
 * MicroTemplate
 *
 * This is a realy simple and small templating engine that encourages the proper
 * use of PHP as a templating language.
 *
 * Copyright (C) 2011 István Miklós Antal <istvan.m.antal@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 * of the Software, and to permit persons to whom the Software is furnished to do
 * so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * The Software shall be used for Good, not Evil.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * @package MicroTemplate
 * @author 2011 István Miklós Antal <istvan.m.antal@gmail.com>.
 * @copyright 2011 István Miklós Antal <istvan.m.antal@gmail.com>.
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @version 1 (2011-03-20)
 * @link http://www,istvan-antal.ro/
 */

class MicroTemplate {

    private $data = array();
    private $config = array(
        'templateDirectory' => 'view'
    );

    private function generate($template) {
        if (!empty ($this->data)) {
            foreach ($this->data as $k=>$v) {
                $$k = $v;
            }
        }
        require $this->config['templateDirectory'].'/'.$template.'.php';
    }
    
    public function setTemplateDirectory($dir) {
        $this->config['templateDirectory'] = $dir;
    }

    public function assign($name, $value) {
        $this->data[$name] = $value;
    }

    public function display($template) {
        $this->generate($template);
    }

    public function fetch($template) {
        ob_start();
        $this->display($template);
        return ob_get_clean();
    }
}