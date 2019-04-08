<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */


class DBContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerIsRunning(UnitTester $I){
        sleep(60);
        $I->wantTo("verify MySQL 5.6 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql");
        $I->seeInShellOutput("true");
    }

    public function testEnvironmentVariable_max_allowed_packet(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - max_allowed_packet");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'max_allowed_packet'\"");
        $I->seeInShellOutput("67108864");
    }

    public function testEnvironmentVariable_event_scheduler(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - event_scheduler");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'event_scheduler'\"");
        $I->seeInShellOutput("ON");
    }

    public function testEnvironmentVariable_connect_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - connect_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'connect_timeout'\"");
        $I->seeInShellOutput("10");
    }

    public function testEnvironmentVariable_innodb_buffer_pool_size(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - innodb_buffer_pool_size");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'innodb_buffer_pool_size'\"");
        $I->seeInShellOutput("2147483648");
    }

    public function testEnvironmentVariable_innodb_log_buffer_size(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - innodb_log_buffer_size");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'innodb_log_buffer_size'\"");
        $I->seeInShellOutput("8388608");
    }

    public function testEnvironmentVariable_innodb_log_file_size(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - innodb_log_file_size");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'innodb_log_file_size'\"");
        $I->seeInShellOutput("1073741824");
    }

    public function testEnvironmentVariable_innodb_lock_wait_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - innodb_lock_wait_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'innodb_lock_wait_timeout'\"");
        $I->seeInShellOutput("30");
    }

    public function testEnvironmentVariable_delayed_insert_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - delayed_insert_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'delayed_insert_timeout'\"");
        $I->seeInShellOutput("300");
    }

    public function testEnvironmentVariable_net_read_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - net_read_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'net_read_timeout'\"");
        $I->seeInShellOutput("30");
    }

    public function testEnvironmentVariable_net_write_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - net_write_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'net_write_timeout'\"");
        $I->seeInShellOutput("60");
    }

    public function testEnvironmentVariable_slave_net_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - slave_net_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'slave_net_timeout'\"");
        $I->seeInShellOutput("600");
    }

    public function testEnvironmentVariable_wait_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - wait_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'wait_timeout'\"");
        $I->seeInShellOutput("600");
    }

    public function testEnvironmentVariable_interactive_timeout(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - interactive_timeout");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'interactive_timeout'\"");
        $I->seeInShellOutput("600");
    }

    public function testEnvironmentVariable_innodb_additional_mem_pool_size(UnitTester $I){
        $I->wantTo("MySQL 5.6 environment variable test - innodb_additional_mem_pool_size");
        $I->runShellCommand("docker exec dev_mysql mysql -uroot -p1234 -e \"show variables like 'innodb_additional_mem_pool_size'\"");
        $I->seeInShellOutput("1073741824");
    }
}