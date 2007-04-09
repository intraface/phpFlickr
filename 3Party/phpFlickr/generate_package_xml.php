<?php
/**
 * package.xml generation script for phpFlickr
 * @package phpFlickr
 * @author  Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version @package-version@
 */

require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);
$pfm = new PEAR_PackageFileManager2();
$pfm->setOptions(
    array(
        'baseinstalldir'    => 'phpFlickr',
        'filelistgenerator' => 'file',
        'packagedirectory'  => dirname(__FILE__),
        'packagefile'       => 'package.xml',
        'ignore'            => array(
			'generate_package_xml.php',
			'package.xml',
			'*.tgz'
			),
		'exceptions'        => array(),
        'simpleoutput'      => true,
	)
);

$pfm->setPackage('phpFlickr');
$pfm->setSummary('PHP api for communicating with Flickr and 23hq photo album.');
$pfm->setDescription('phpFlickr is a class written by Dan Coulter in PHP4 to act as a wrapper for Flickr\'s API. Methods process the response XML and return a friendly array of data to make development simple and intuitive.');
$pfm->setUri('http://localhost/');
$pfm->setLicense('LGPL License', 'http://www.gnu.org/licenses/lgpl.html');
$pfm->addMaintainer('lead', 'lars', 'Lars Olesen', 'lars@legestue.net');

$pfm->setPackageType('php');

$pfm->setAPIVersion('1.6.1');
$pfm->setReleaseVersion('1.6.1');
$pfm->setAPIStability('beta');
$pfm->setReleaseStability('stable');
$pfm->setNotes('Needs to be filled in');
$pfm->addRelease();

$pfm->addGlobalReplacement('package-info', '@package-version@', 'version');

$pfm->clearDeps();
$pfm->setPhpDep('4.3.0');
$pfm->setPearinstallerDep('1.5.0');
$pfm->addPackageDepWithChannel('required', 'DB', 'pear.php.net', '0.1.0');
$pfm->addPackageDepWithChannel('required', 'HTTP_Request', 'pear.php.net', '0.1.8');
$pfm->addPackageDepWithChannel('required', 'Net_Socket', 'pear.php.net', '0.1.8');
$pfm->addPackageDepWithChannel('required', 'Net_Url', 'pear.php.net', '0.1.8');

$pfm->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	echo 'write package file';
    $pfm->writePackageFile();
} else {
	echo 'debug package file';
    $pfm->debugPackageFile();
}
?>