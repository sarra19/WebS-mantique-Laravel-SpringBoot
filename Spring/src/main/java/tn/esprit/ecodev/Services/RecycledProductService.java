package tn.esprit.ecodev.Services;

import tn.esprit.ecodev.Entities.RecycledProduct;

import java.util.List;

public interface RecycledProductService {

    List<RecycledProduct> getAllProducts();
    RecycledProduct getProductById(Long id);
    RecycledProduct createProduct(RecycledProduct product);
    RecycledProduct updateProduct(Long id, RecycledProduct product);
    void deleteProduct(Long id);

}
