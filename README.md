otshosting-provisioning
=======================
This is an Ansible playbook used to fully provision a Ubuntu machine for OTS Hosting.

A script to run on a standalone machine to provision it. If otsmanager user does not exist, it will be created with "otsmanager" password.
```bash
#!/bin/bash -ex
apt-get update
apt-get install -y -q python-paramiko python-yaml python-jinja2 python-simplejson
apt-get install -y -q git-core
apt-get install -y -q software-properties-common python-software-properties

apt-add-repository --yes ppa:rquillo/ansible
apt-get update
apt-get install -y -q ansible

echo "localhost" > /tmp/ansible_hosts
export ANSIBLE_HOSTS=/tmp/ansible_hosts

ansible-pull -U https://github.com/DSpeichert/otshosting-provisioning.git -d /srv 

exit 0
```

A script to convert Ubuntu Cloud Image (http://cloud-images.ubuntu.com/trusty/current/trusty-server-cloudimg-amd64-root.tar.gz) to OpenVZ form:
```bash
#!/bin/bash
if [ $# -ne 1 ]; then
  echo "Usage: `basename $0` {template name in /vz/template/cache}"
  exit 1
fi

if [ ! -f "/vz/template/cache/$1" ]; then
  echo "/vz/template/cache/$1 is not a file"
  exit 1
fi

set -e
set -x
rm -rf /tmp/template
mkdir /tmp/template
cd /tmp/template
tar xzf /vz/template/cache/$1

# http://www.turnkeylinux.org/forum/support/20131211/rsyslog-spinning-cpu-openvz
sed -i -e 's/^\$ModLoad imklog/#\$ModLoad imklog/g' etc/rsyslog.conf

# https://bugs.launchpad.net/ubuntu/+source/ifupdown/+bug/1294155
sed -i -e 's/lxc|lxc-libvirt/lxc|lxc-libvirt|openvz/g' etc/init/network-interface-container.conf

sed -i -e 's/^PasswordAuthentication no/PasswordAuthentication yes/g' etc/ssh/sshd_config

# Some nameservers
echo 'nameserver 8.8.8.8' >> etc/resolvconf/resolv.conf.d/base
echo 'nameserver 8.8.4.4' >> etc/resolvconf/resolv.conf.d/base

tar --numeric-owner -zcf /vz/template/cache/$1 .
```
