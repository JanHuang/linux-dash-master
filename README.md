#linux-dash-master
===================

## php环境要求
1.php version >= 5.3.3

2.pcntl扩展

3.sockets扩展

##安装步骤
1.配置slave监听ip 和 端口 scripts/slave/config/**config.json** 修改**host** 和 **port**

2.被检测机器运行scripts/slave/**slave**文件 **php slave start**
> **Note:** 需要注意的是，防火墙是否允许监听端口对外访问.  

3.配置监听机**host** 和 端口 **port** scripts/master/config/**config.json**
> **Note:** **slave** 配置需要监听的机器列表 **host** **port** 

4.配置完成后，打开 **application/index.php** 查看机器状态