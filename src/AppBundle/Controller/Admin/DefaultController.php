<?php
/**
 * Created by PhpStorm.
 * User: Grisel
 * Date: 08/12/2016
 * Time: 19:21
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 * @package AppBundle\Controller\Admin
 */
class DefaultController extends Controller
{
    /**
     * This controller responds to two different routes with the same URL:
     *   * 'admin_post_index' is the route with a name that follows the same
     *     structure as the rest of the controllers of this class.
     *   * 'admin_index' is a nice shortcut to the backend homepage. This allows
     *     to create simpler links in the templates. Moreover, in the future we
     *     could move this annotation to any other controller while maintaining
     *     the route name and therefore, without breaking any existing link.
     *
     * @Route("/", name="admin_index")
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->findAll();
        return $this->render('admin/default/index.html.twig', ['users' => $users]);
    }
}