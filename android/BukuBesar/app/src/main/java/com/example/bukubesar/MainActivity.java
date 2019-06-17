package com.example.bukubesar;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.accessibility.AccessibilityManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    private EditText username, password;
    private Button login, cancel;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //kita akan buat objek komponen
        username = findViewById(R.id.txtUsername);
        password = findViewById(R.id.txtPassword);

        login = findViewById(R.id.btnLogin);
        cancel = findViewById(R.id.btnCancel);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //kondisi perbandingan antara username dan password
                if (username.getText().toString().equals("admin") && password.getText().toString().equals("admin")) {
                    //memanggil activity menu utama menggunakan Intent
                    Intent panggil = new Intent(MainActivity.this, activity_dashboard.class);
                    startActivity(panggil);

                    Toast.makeText(getApplicationContext(), "Login Berhasil!", Toast.LENGTH_SHORT).show();
                }else{
                    Toast.makeText(getApplicationContext(),"Login Gagal!", Toast.LENGTH_SHORT).show();
                    username.setText("");
                    password.setText("");

                }
            }
        });

        //ngasih event ke button cancel
        cancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();

            }
        });
    }
}

