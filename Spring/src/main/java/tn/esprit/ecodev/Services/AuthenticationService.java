package tn.esprit.ecodev.Services;


import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.BadCredentialsException;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;
import tn.esprit.ecodev.Repositories.UserRepository;
import tn.esprit.ecodev.dto.LoginUserDto;
import tn.esprit.ecodev.dto.RegisterUserDto;
import tn.esprit.ecodev.Entities.User;

import java.time.LocalDateTime;
import java.util.Date;

@Service
public class AuthenticationService {
    private final UserRepository userRepository;

    private final PasswordEncoder passwordEncoder;

    private final AuthenticationManager authenticationManager;

    public AuthenticationService(
            UserRepository userRepository,
            AuthenticationManager authenticationManager,
            PasswordEncoder passwordEncoder
    ) {
        this.authenticationManager = authenticationManager;
        this.userRepository = userRepository;
        this.passwordEncoder = passwordEncoder;
    }

    public User signup(RegisterUserDto input) {
        User user = User.builder()
                .name(input.getName())
                .username(input.getUsername())
                .phone(input.getPhone())
                .email(input.getEmail())
                .password(passwordEncoder.encode(input.getPassword()))
                .role("0") // Set default role
                .createdAt(new Date())
                .updatedAt(new Date())
                .emailVerifiedAt(LocalDateTime.now()) // Set the verified time here
                .build();

        return userRepository.save(user);
    }


    public User authenticate(LoginUserDto input) {
        try {
            authenticationManager.authenticate(
                    new UsernamePasswordAuthenticationToken(
                            input.getEmail(),
                            input.getPassword()
                    )
            );
        } catch (BadCredentialsException e ) {
            throw new RuntimeException("Invalid email or password", e);
        } catch (AuthenticationException e) {
            throw new RuntimeException("Authentication failed", e);
        }

        return userRepository.findByEmail(input.getEmail())
                .orElseThrow(() -> new RuntimeException("User not found"));
    }
}