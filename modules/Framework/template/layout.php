<!DOCTYPE html>
<html>
    <? include $this->template->partial($this->template->getTemplatePath() . "/_partial/head") ?>
    <body>
        <? include $this->template->renderContent() ?>
    </body>
</html>