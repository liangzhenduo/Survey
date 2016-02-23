#include <iostream>
#include <cstdio>
#include <cstring>
using namespace std;
int main(){
	char buf[100],name[100];
	freopen("query.out","w",stdout);
	while(cin>>buf){
		if(buf[0]=='`'){
			int i;
			for(i=1;buf[i]!='`';i++){
				name[i-1]=buf[i];
			}
			name[i-1]='\0';
			cout<<buf<<"='$_POST["<<name<<"]', "<<endl;
		}
	}
}