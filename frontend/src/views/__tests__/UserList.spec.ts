import { describe, it, expect, vi } from 'vitest';
import { mount } from '@vue/test-utils';
import UserList from '../UserList.vue';
import { useUserStore } from '@/stores/userStore'; 

// Mock the Pinia store
vi.mock('@/stores/userStore', () => ({
  useUserStore: vi.fn(() => ({
    users: [
      { id: 1, name: 'John Doe', email: 'john@example.com', latitude: 40.7128, longitude: -74.0060 },
      { id: 2, name: 'Jane Doe', email: 'jane@example.com', latitude: 34.0522, longitude: -118.2437 },
    ],
    loading: false,
    error: null,
    fetchUsers: vi.fn(),
  })),
}));

describe('UserList.vue', () => {
  it('renders a list of users', () => {
    const wrapper = mount(UserList);

    // Check if the users are rendered
    expect(wrapper.text()).toContain('John Doe');
    expect(wrapper.text()).toContain('Jane Doe');
  });

  it('shows a loading message when loading', () => {
    // Mock the store to return loading: true
    useUserStore.mockImplementation(() => ({
      users: [],
      loading: true,
      error: null,
      fetchUsers: vi.fn(),
    }));

    const wrapper = mount(UserList);

    // Check if the loading message is displayed
    expect(wrapper.text()).toContain('Loading...');
  });

  it('shows an error message when there is an error', () => {
    // Mock the store to return an error
    useUserStore.mockImplementation(() => ({
      users: [],
      loading: false,
      error: 'Failed to fetch users',
      fetchUsers: vi.fn(),
    }));

    const wrapper = mount(UserList);

    // Check if the error message is displayed
    expect(wrapper.text()).toContain('Failed to fetch users');
  });
});