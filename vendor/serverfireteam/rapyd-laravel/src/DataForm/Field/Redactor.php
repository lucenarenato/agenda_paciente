<?php namespace Zofe\Rapyd\DataForm\Field;


use Collective\Html\FormFacade as Form;
use Zofe\Rapyd\Rapyd;
class Redactor extends Field
{
  public $type = "text";

  public function build()
  {
    $output = "";
    if (parent::build() === false) return;

    switch ($this->status) {
      case "disabled":
      case "show":

        if ($this->type =='hidden' || $this->value == "") {
          $output = "";
        } elseif ( (!isset($this->value)) ) {
          $output = $this->layout['null_label'];
        } else {
          $output = nl2br(htmlspecialchars($this->value));
        }
        $output = "<div class='help-block'>".$output."&nbsp;</div>";
        break;

      case "create":
      case "modify":

        Rapyd::js('tinymce/tinymce.min.js');
        Rapyd::js('tinymce/tinymce_editor.js');
        $output  = Form::textarea($this->name, $this->value, $this->attributes);
	Rapyd::script("function elFinderBrowser (field_name, url, type, win) {" .
		      "tinymce.activeEditor.windowManager.open({" .
		      "file: '" . route('elfinder.tinymce4') . "'," .
		      "title: 'elFinder 2.0'," .
		      "width: 900," .
		      "height: 450," .
		      "resizable: 'yes'" .
		      "}, {" .
		      "setUrl: function (url) {" .
		      "win.document.getElementById(field_name).value = url;" .
		      "}" .
		      "});" .
		      "return false;" .
		      "}");
        Rapyd::script("tinymce.init({selector: '#".$this->name."', file_browser_callback : elFinderBrowser, plugins: 'image, link', convert_urls: false});");
        break;

      case "hidden":
        $output = Form::hidden($this->name, $this->value);
        break;

      default:;
    }
    $this->output = "\n".$output."\n". $this->extra_output."\n";
  }

}
