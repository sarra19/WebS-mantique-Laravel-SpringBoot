package tn.esprit.ecodev.Services;


import tn.esprit.ecodev.Entities.User;
import tn.esprit.ecodev.dto.RegisterUserDto;

import java.util.List;

public interface UserService {
    User updateUser(Long id, RegisterUserDto input);
    List<User> getAllUsers();
    void deleteUser(Long id);
    User findUserByEmail(String email);
}
