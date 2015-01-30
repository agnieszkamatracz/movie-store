<?php

namespace SklepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * Główny kontroler, zawiera odwołanai do innych "pod kontrolerów w tym folderze"
     * @Route("/", name="glowna")
     * @Template("SklepBundle:Glowny:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }
}
