package tn.esprit.ecodev.Controllers;

import lombok.AllArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import tn.esprit.ecodev.Entities.RecycledProduct;
import tn.esprit.ecodev.Services.RecycledProductService;

import java.util.List;

@RestController
@AllArgsConstructor
@RequestMapping("/api/recycled-products")
public class RecycledProductController {

    private RecycledProductService recycledProductService;

    @GetMapping
    public List<RecycledProduct> getAllProducts() {
        return recycledProductService.getAllProducts();
    }

    @GetMapping("/{id}")
    public ResponseEntity<RecycledProduct> getProductById(@PathVariable Long id) {
        RecycledProduct product = recycledProductService.getProductById(id);
        return product != null ? ResponseEntity.ok(product) : ResponseEntity.notFound().build();
    }

    @PostMapping
    public ResponseEntity<RecycledProduct> createProduct(@RequestBody RecycledProduct product) {
        RecycledProduct createdProduct = recycledProductService.createProduct(product);
        return ResponseEntity.status(HttpStatus.CREATED).body(createdProduct);
    }

    @PutMapping("/{id}")
    public ResponseEntity<RecycledProduct> updateProduct(@PathVariable Long id, @RequestBody RecycledProduct product) {
        RecycledProduct updatedProduct = recycledProductService.updateProduct(id, product);
        return updatedProduct != null ? ResponseEntity.ok(updatedProduct) : ResponseEntity.notFound().build();
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteProduct(@PathVariable Long id) {
        recycledProductService.deleteProduct(id);
        return ResponseEntity.noContent().build();
    }
}
