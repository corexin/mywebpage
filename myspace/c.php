
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META Name="keywords" Content="Australia, E, Zone, Programming, C, tutorial, Advance">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>My Space - C</title>
</head>

<body>
<p> </p>
<table width="700" border="0" align="left" cellpadding="3" bgcolor="#FFFFFF" id="myforum">
  <tr align="left" bgcolor="#66CCFF"> 
    <td height="20" align="center" valign="middle">C</td>
  </tr>
  <tr> 
    <td align="left" valign="top" > <p> C is my first programming 
        language, the core of it is needle ;) I will start from scratch to make 
        the tutorial ranging from basic to advanced topics.</p>
      <p>I prefer learning from sample coding which will go through all the pages. 
        first of all I should say I have some working experience will C, but not 
        that advanced, so just make the tutorial as a guide please.</p>
      <p>Oh, forgot the IDE, get one from <a href="http://www.bloodshed.net" target="_blank">http://www.bloodshed.net</a></p>
      <p>There is a lot of C tutorials on the internet, I am lazy guy just list 
        them as below for reference.</p>
      <p><a href="http://www.its.strath.ac.uk/courses/c/" target="_blank">http://www.its.strath.ac.uk/courses/c/</a></p>
      <p><a href="http://www.le.ac.uk/cc/tutorials/c/" target="_blank">http://www.le.ac.uk/cc/tutorials/c/</a></p>
      <p>The important thing is <strong>coding, reading and asking.</strong></p>
      <p>The most popular I used at my work place is loading all records into 
        a structure and sort.</p>
      <p>Just wanna leave some pieces of sample code here.</p>
      <p>#define RECORD char **</p>
      <p>this will define a simple structure to hold all fields of each record. 
        let me give an example</p>
      <table width="400" border="1" cellpadding="1">
        <tr>
          <td>rec[0]</td>
          <td>rec[1]</td>
          <td>rec[2]</td>
          <td>rec[3]</td>
        </tr>
        <tr> 
          <td>Name</td>
          <td>Sex</td>
          <td>Age</td>
          <td>Addr</td>
        </tr>
        <tr> 
          <td>Jack</td>
          <td>M</td>
          <td>18</td>
          <td>123 Abc St. Melbourne 3000</td>
        </tr>
      </table>
      <p>suppose we have a variable RECORD rec=....</p>
      <p>so rec[0] will hold the value: &quot;Jack&quot;, rec[1]=&quot;M&quot;, 
        etc.</p>
      <p>Ok, let's talk about how to realize the function</p>
      <p>we define a variable: RECORD rec = NULL;</p>
      <p> we need allocation memory so that we can hold all records from file 
        into memory. so we do like this</p>
      <p>rec=(RECORD)realloc(rec,numOfFields*(sizeof(char *)));</p>
      <p>ok we got memory to point to a record now, in each record there are many 
        fields..., so we need do the same thing again for different fields.</p>
      <p>int i;</p>
      <p>for(i=0;i&lt;numOfFields;i++){</p>
      <p>rec[i]=(char*)malloc(sizeof(char)*lengthOfField+1); </p>
      <p>if(rec[i]==NULL){</p>
      <p>printf(&quot;Error: bla....&quot;);</p>
      <p>exit(1);</p>
      <p>}</p>
      <p>}</p>
      <p><strong>import: need check memory allocaiton return status using if(...) 
        to check whether return OK.</strong></p>
      <p>finally we got memory for one record only, we still need get memory to 
        hold total records.</p>
      <p>so we do as below</p>
      <p>RECORD *allRec=NULL;</p>
      <p>allRec=(RECORD*)realloc(allRec,recCount*sizeof(RECORD));</p>
      <p>so we record number growing we got all memory allocation, you can go 
        through all record by using allRec[i], and allRec[i][j].</p>
      <p>after finish using, dont forget free it. in this case, you need free 
        the record Field first, then free record and at last free the pointer 
        to all records. logic is as below, need change a bit to fit your program.</p>
      <p>for(i=0;i&lt;recordCount;i++){</p>
      <p>for(j=0;j&lt;fieldCount;j++){</p>
      <p>free(allRec[i][j]);</p>
      <p>}</p>
      <p>free(allRec[i]);</p>
      <p>}</p>
      <p>free(allRec);</p>
      <p>Cheers.</p>
      <p>Steven </p>
      <p><font color="#FF0000">15-06-2006</font></p>
      <p>Add a bit more, what is difference between strncpy() and strcpy()?</p>
      <p>remember strncpy() won't put a '\0' at the end of the string, so if you 
        miss this, mistake will happened without being noticed.</p>
      <p><font color="#FF0000">18-06-2006</font></p>
      </td>
  </tr>
</table>
</body>
</html>
