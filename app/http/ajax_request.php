<?php

chdir('../../');

include 'config/autoloader.php';



	$action = (isset($_GET['action'])) ? $_GET['action'] : '';

	$conn = Conn::get();

	switch ($action) {
		case 'disable-link':
			
			$linkManager = new ManagerLinks();
			$linkManager->conn = &$conn;
			echo $linkManager->disable($_GET['id-link']);

		break;

		case 'enable-link':
			
			$linkManager = new ManagerLinks();
			$linkManager->conn = &$conn;
			echo $linkManager->enable($_GET['id-link']);

		break;


		case 'load-enabled-links':
			$linkManager = new ManagerLinks();
			$linkManager->conn = &$conn;
			$enabled_links = $linkManager->getActiveLinks();

			echo json_encode($enabled_links);
		break;

		case 'load-disabled-links':
			$linkManager = new ManagerLinks();
			$linkManager->conn = &$conn;
			$disabled_links = $linkManager->getDisabledLinks();

			echo json_encode($disabled_links);
		break;

		case 'load-enabled-notices':
			$noticeManager = new ManagerNotice();
			$noticeManager->conn = &$conn;
			$active_notices = $noticeManager->getActives();

			echo json_encode($active_notices);
		break;

		case 'load-disabled-notices':
			$noticeManager = new ManagerNotice();
			$noticeManager->conn = &$conn;
			$disabled_notices = $noticeManager->getDisabled();

			echo json_encode($disabled_notices);
		break;

		case 'disable-notice':
			$noticeManager = new ManagerNotice();
			$noticeManager->conn = &$conn;

			echo $noticeManager->disable($_GET['id_notice']);
		break;

		case 'enable-notice':
			$noticeManager = new ManagerNotice();
			$noticeManager->conn = &$conn;

			echo $noticeManager->enable($_GET['id_notice']);
		break;

		case 'delete-notice':
			$noticeManager = new ManagerNotice();
			$noticeManager->conn = &$conn;
			echo $noticeManager->delete($_GET['id_notice']);
		break;


		case 'add-noticia':
			$noticeManager = new ManagerNotice();
			$noticeManager->conn = &$conn;

			echo $noticeManager->add($_GET['titulo'], $_GET['conteudo']);

		break;


		case 'load-enabled-posts':
			$postManager = new ManagerPosts();
			$postManager->conn = &$conn;
			$active_posts = $postManager->getActives();
			echo json_encode($active_posts);
		break;

		case 'load-disabled-posts':
			$postManager = new ManagerPosts();
			$postManager->conn = &$conn;
			$disabled_posts = $postManager->getDisabled();
			echo json_encode($disabled_posts);
		break;

		case 'enable-post':
			$postManager = new ManagerPosts();
			$postManager->conn = &$conn;

			echo $postManager->enable($_GET['id-post']);
		break;

		case 'disable-post':
			$postManager = new ManagerPosts();
			$postManager->conn = &$conn;

			echo $postManager->disable($_GET['id-post']);
		break;

		case 'add-post':
			$postManager = new ManagerPosts();
			$postManager->conn = &$conn;
			$postManager->titulo = $_GET['titulo'];
			$postManager->sub_titulo = $_GET['sub_titulo'];
			$postManager->conteudo = $_GET['conteudo'];
			$postManager->descricao = $_GET['descricao'];
			$postManager->chave = $_GET['chave'];
			$postManager->flg_ativo = (int)$_GET['flg_ativo'];

			// var_dump($postManager);

			var_dump($postManager->add());
			
		break;


		case 'load-texts':
			$managerText = new ManagerText();
			$managerText->conn=&$conn;
			$textos = $managerText->getTextos();
			echo json_encode($textos);
		break;

		case 'change-texts':
			$managerText = new ManagerText();
			$managerText->conn=&$conn;

			$managerText->textos['texto_topo'] = $_GET['texto_topo'];
			echo $managerText->changeTexts();

			// var_dump($_GET);
		break;

		case 'teste':
			var_dump($_GET);
		break;
		
		default:
			# code...
			break;
	}

	$conn->close();