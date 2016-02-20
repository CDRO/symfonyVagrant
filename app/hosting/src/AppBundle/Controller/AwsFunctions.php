<?php
/**
 * Created by PhpStorm.
 * User: sebastian
 * Date: 20.02.16
 * Time: 16:48
 */

namespace AppBundle\Controller;

use Aws\Ec2\Ec2Client;
use Aws\Symfony\AwsBundle;
use Aws\Rds\RdsClient;

class AwsFunctions
{
    public function initEC2($region, $version) {
        $ec2 = new Ec2Client([
            'version' => $version,
            'region' => $region
        ]);

        return $ec2;
    }

    public function initRDS($region, $version) {
        $rds = new RdsClient([
            'version' => $version,
            'region' => $region
        ]);

        return $rds;
    }

    public function stopInstance($instance, $dry = false, $force = false, $ec2){
        $result = $ec2->startInstances([
            // InstanceIds is required
            'InstanceIds' => ['i-1459b19e'],
            'Force' => true,
        ]);
    }

    public function createDatabaseRDS($rds) {
        $result = $rds->createDBInstance([
            'AllocatedStorage' => 15,
            'DBInstanceClass' => 'db.m1.large',
            'DBInstanceIdentifier' => 'dbuser',
            'Engine' => 'MySQL',
            'MasterUserPassword' => 'dbpassdbpass',
            'MasterUsername' => 'dbuser'
        ]);
        return $result;
    }

}