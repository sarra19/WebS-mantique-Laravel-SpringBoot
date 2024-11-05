package tn.esprit.ecodev.dto;

import lombok.Getter;
import lombok.Setter;

@Getter
@Setter
public class RegisterUserDto {
    private String name;
    private String username;
    private String phone;
    private String email;
    private String password;

}
