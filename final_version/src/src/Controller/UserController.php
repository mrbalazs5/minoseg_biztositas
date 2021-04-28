<?php declare(strict_types=1);

namespace Controller;

use Entity\User;
use Entity\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Service\ValidatorService;

class UserController extends AbstractController {
    
    public function postRegistrationAction(Request $request, ValidatorService $validator, LoggerInterface $logger) {
        try {
            $email = $request->request->get('email');
            $userName = $request->request->get('username');
            $password = $request->request->get('password');

            $validator->validateEmail($email);
            $validator->validateStringLengthInterval($userName, 4, 14);
            $validator->validatePassword($password);

            $user = new User();

            $user->setEmail($email);
            $user->setUserName($userName);
            $user->setPassword($password);

            return new Response('Registration successfull!', Response::HTTP_OK);
        } catch(\Exception $e) {
            $logger->error($e->getMessage());

            return new Response('Registration failed!', Response::HTTP_BAD_REQUEST);
        }
    }

    public function postLoginAction(Request $request, ValidatorService $validator, LoggerInterface $logger) {
        try {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            $validator->validateEmail($email);
            $validator->validatePassword($password);

            $user1 = new User();

            $user1->setEmail("test@test.com");
            $user1->setUserName("John");
            $user1->setPassword("test1234");

            $user2 = new User();

            $user2->setEmail("test2@test.com");
            $user2->setUserName("Peter");
            $user2->setPassword("123456");

            $user3 = new User();

            $user3->setEmail("test3@test.com");
            $user3->setUserName("Kate");
            $user3->setPassword("567891011");

            $users = [
                $user1,
                $user2,
                $user3
            ];

            $userResults = array_filter($users, function($user) use($email) {
                return $user->getEmail() === $email;
            });

            if(!is_array($userResults) && !($userResults[0] instanceof UserInterface)) {
                throw new \Exception("User not found.");
            }

            $user = $userResults[0];

            if(!User::verifyPassword($password, $user->getPassword())) {
                throw new \Exception("Failed to authenticate user.");
            }

            return new Response('Login successfull!', Response::HTTP_OK);
        } catch(\Exception $e) {
            $logger->error($e->getMessage());

            return new Response('Login failed!', Response::HTTP_UNAUTHORIZED);
        }
    }

}