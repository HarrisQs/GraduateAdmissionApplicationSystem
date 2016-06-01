#include <iostream>
#include <string>
#include "Box.h"

using namespace std;

Box::Box()
{
	length = 0;
	breadth = 0;
	height = 0;
	_name = "noname box"; 
	cout << "Box constructor called" << endl;
}
Box::Box(double leng,double brea,double hei,const char*name)
{
	length = leng;
	breadth = brea;
	height = hei;
	_name = name;
	cout << "Box constructor called"<<endl;
}
Box::Box(double leng,double brea,double hei,string &name)
{
        length = leng;
        breadth = brea;
        height = hei;
        _name = name;
        cout << "Box constructor called"<<endl;
}
double Box::volume()
{
	return length*breadth*height;
}
int Box::compareVolume(Box volume2)
{
	if(volume() > volume2.volume())
		return 1;
	else
		return -1;
}
string& Box::name()
{
	return _name;
}
