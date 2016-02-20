<?php

namespace AppBundle\Controller;

use AppBundle\Controller\AwsFunctions;
use Aws\Ec2\Ec2Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Aws\Symfony\AwsBundle;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $aws = new AwsFunctions();

        $init = $aws->initRDS('eu-west-1', 'latest');

        $database = $aws->createDatabaseRDS($init);

        var_dump( $database);

die;

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
