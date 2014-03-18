otshosting-provisioning
=======================

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
