package com.example.application2;

import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    private EditText numero1, numero2;
    private TextView resultado;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        numero1 = findViewById(R.id.num1);
        numero2 = findViewById(R.id.num2);
        resultado = findViewById(R.id.suma);

    }
    //METODO de suma
    public void Sumita(View view){
        String v1=numero1.getText().toString();
        String v2=numero2.getText().toString();

        double num1 = Double.parseDouble(v1);
        double num2 = Double.parseDouble(v2);

        double resultadito = num1+num2;

        String result = String.valueOf(resultadito);

        resultado.setText(result);
    }

}