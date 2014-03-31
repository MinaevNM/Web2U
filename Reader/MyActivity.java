package com.example.Reader2;

import android.app.Activity;
import android.os.Bundle;
import android.text.format.DateFormat;
import android.webkit.JavascriptInterface;
import android.widget.EditText;
import android.widget.SeekBar;
import android.widget.TextView;

import java.io.*;
import java.util.Calendar;

public class MyActivity extends Activity
{
  final int min = 100;
  final int max = 400;
  int words_per_min = min;
  TextView tv;

  int readFile()
  {
    try
    {
      BufferedReader br = new BufferedReader(new InputStreamReader(openFileInput("progress.txt")));
      String str = br.readLine();
      return Integer.parseInt(str);
    }
    catch (FileNotFoundException e)
    {
      e.printStackTrace();
    }
    catch (IOException e)
    {
      e.printStackTrace();
    }
    return 0;
  }

  void writeFile( int x )
  {
    try
    {
      BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(openFileOutput("progress.txt", MODE_PRIVATE)));
      bw.write(Integer.toString(x));
      bw.close();
    }
    catch (FileNotFoundException e)
    {
      e.printStackTrace();
    }
    catch (IOException e)
    {
      e.printStackTrace();
    }
  }

  @Override
  public void onCreate(Bundle savedInstanceState)
  {
      super.onCreate(savedInstanceState);
      setContentView(R.layout.main);

      tv = (TextView)findViewById(R.id.textView);
      final TextView ts = (TextView)findViewById(R.id.textSpeed);
      SeekBar sb = (SeekBar)findViewById(R.id.seekBar);
      ts.setText(min + " words per minute");
      final WordsWriter ww = new WordsWriter(this);
      sb.setOnSeekBarChangeListener(
            new SeekBar.OnSeekBarChangeListener()
            {
              @Override
              public void onProgressChanged(SeekBar seekBar, int progressValue, boolean fromUser)
              {
                words_per_min = min + (max - min) / 100 * progressValue;
              }

              @Override
              public void onStartTrackingTouch(SeekBar seekBar)
              {
              }

              @Override
              public void onStopTrackingTouch(SeekBar seekBar)
              {
                ts.setText(words_per_min + " words per minute");
              }
            }
    );

    Thread t = new Thread()
      {
      @Override
      public void run()
      {
        try
        {
          while (!isInterrupted())
          {
              Thread.sleep(60000 / words_per_min);
              runOnUiThread(new Runnable()
              {
              @Override
              public void run()
              {
                ww.updateTextView();
              }
              });
          }
        } catch (InterruptedException e)
        {
        }
      }
    };

    t.start();
  }
}
