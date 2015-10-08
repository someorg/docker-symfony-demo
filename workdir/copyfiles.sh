cd /root/workdir
cp "DefaultController.php" /root/project/src/MyNameSpace/MyBundle/Controller/
cp cms_edit.html.twig cms_view.html.twig /root/project/src/MyNameSpace/MyBundle/Resources/views/Default
cp mybase.html.twig /root/project/src/MyNameSpace/MyBundle/Resources/views/
mkdir -p /root/project/src/MyNameSpace/MyBundle/Form/
cp "validation.yml" /root/project/src/MyNameSpace/MyBundle/Resources/config/
mkdir -p /root/project/src/MyNameSpace/MyBundle/DataFixtures/ORM
cp LoadCMS.php /root/project/src/MyNameSpace/MyBundle/DataFixtures/ORM 
cp AppKernel.php /root/project/app
