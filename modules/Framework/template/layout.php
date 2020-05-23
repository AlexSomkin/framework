<!DOCTYPE html>
<html>
    <? include $this->template->partial($this->template->getTemplatePath() . "/_partial/head") ?>
    <body>
        123
        <? include $this->template->renderContent() ?>
    </body>
</html>