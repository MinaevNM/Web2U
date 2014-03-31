package com.example.Reader2;

import android.widget.TextView;

import java.io.*;

public class WordsWriter
{
  //String s = "aaa bbb ccc ddd eee fff";
  String s = "Мы работаем на рынке веб-разработок с 2009 года. " +
          "Мы постоянно расширяем спектр услуг и, благодаря этому, наши заказчики получают комплексное интернет-решение, не обращаясь в несколько организаций. " +
          "Вне зависимости от сложности поставленной задачи, будь то создание или продвижение сайта, увеличение конверсии, реклама и PR вашей организации " +
          "в Интернете, наши специалисты тщательно продумают все этапы реализации. Это позволит вам с самого начала нашего сотрудничества понимать, что должно " +
          "получиться в конечном итоге, исключая малейшую вероятность того, что ваши ожидания не совпадут с результатом. ";
  char [] cs;
  int pos;
  TextView output;
  MyActivity act;

  public WordsWriter( MyActivity _act )
  {
    act = _act;
    pos = act.readFile();
    output = act.tv;
    cs = new char[s.length()];
    cs = s.toCharArray();
  }
  public void updateTextView()
  {
    int oldpos = pos;
    while(pos < s.length() && cs[pos] != ' ')
      pos++;
    output.setText(cs, oldpos, pos - oldpos);
    if (pos < s.length())
      pos++;
    else
      pos = 0;
    act.writeFile(pos);
  }
}
