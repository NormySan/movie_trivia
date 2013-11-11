<?php

function HomeController()
{
	// Return the frontpage template file
	return getTemplate('frontpage');
}

function AdminController()
{
	return getTemplate('admin');
}